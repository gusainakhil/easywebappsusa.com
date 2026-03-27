<?php
declare(strict_types=1);

require_once __DIR__ . '/admin-lite/config.php';

function ewaGetCompanyContact(): array
{
    static $contact = null;

    if (is_array($contact)) {
        return $contact;
    }

    $fallback = [
        'phone_display' => '+1 (844) 00000',
        'email_display' => 'info@everythingeasy.com',
        'address_line_1' => '123 Tech Boulevard',
        'address_line_2' => 'New York, NY 10001, USA',
    ];

    $row = [];

    try {
        $result = dbLite()->query('SELECT * FROM `company_detail` ORDER BY `id` ASC LIMIT 1')->fetch();
        if (is_array($result)) {
            $row = $result;
        }
    } catch (Throwable $e) {
        $row = [];
    }

    $pick = static function (array $keys) use ($row): string {
        foreach ($keys as $key) {
            $value = trim((string) ($row[$key] ?? ''));
            if ($value !== '') {
                return $value;
            }
        }

        return '';
    };

    $phoneDisplay = $pick([
        'phone',
        'phone_number',
        'contact_phone',
        'contact_number',
        'company_phone',
        'mobile',
    ]);

    $emailDisplay = $pick([
        'email',
        'company_email',
        'contact_email',
        'support_email',
    ]);

    $addressLine1 = $pick([
        'address',
        'company_address',
        'address_line_1',
        'address_line1',
        'street_address',
    ]);

    $addressLine2 = $pick([
        'address_line_2',
        'address_line2',
        'city_state_zip',
        'location',
    ]);

    if ($addressLine2 === '') {
        $city = $pick(['city']);
        $state = $pick(['state', 'province']);
        $postal = $pick(['zip', 'zip_code', 'postal_code']);
        $country = $pick(['country']);

        $parts = array_filter([$city, $state, $postal, $country], static fn (string $part): bool => $part !== '');
        $addressLine2 = implode(', ', $parts);
    }

    $phoneDisplay = $phoneDisplay !== '' ? $phoneDisplay : $fallback['phone_display'];
    $emailDisplay = $emailDisplay !== '' ? $emailDisplay : $fallback['email_display'];
    $addressLine1 = $addressLine1 !== '' ? $addressLine1 : $fallback['address_line_1'];
    $addressLine2 = $addressLine2 !== '' ? $addressLine2 : $fallback['address_line_2'];

    $phoneHref = 'tel:' . preg_replace('/[^\d+]/', '', $phoneDisplay);
    if ($phoneHref === 'tel:') {
        $phoneHref = 'tel:+18448327932';
    }

    $addressDisplay = trim($addressLine1 . ', ' . $addressLine2, ', ');

    $contact = [
        'phone_display' => $phoneDisplay,
        'phone_href' => $phoneHref,
        'email_display' => $emailDisplay,
        'email_href' => 'mailto:' . $emailDisplay,
        'address_line_1' => $addressLine1,
        'address_line_2' => $addressLine2,
        'address_display' => $addressDisplay,
        'address_href' => 'https://www.google.com/maps/search/' . rawurlencode($addressDisplay),
    ];

    return $contact;
}

<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

const DB_HOST = '68.178.236.80';
const DB_PORT = '3306';
const DB_NAME = 'EverythingeasyDatabase_usa';
const DB_USER = 'everythingeasyuser';
const DB_PASS = 'nU7H[I7#gN)d';

const ADMIN_USER = 'admin';
const ADMIN_PASS = 'Admin@123';

function dbLite(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function adminLiteTables(): array
{
    return [
        'blogs' => 'Blogs',
        'quotes' => 'Quotes',
        'contact_form' => 'Contact Form',
        'company_detail' => 'Company Detail',
        'job_applications' => 'Job Applications',
        'locations' => 'Locations',
        'locations_application' => 'Locations Application',
    ];
}

function quoteIdentLite(string $name): string
{
    return '`' . str_replace('`', '``', $name) . '`';
}

    </main>
  </div>
  <script>
    function copyText(value) {
      if (!value) return;
      navigator.clipboard.writeText(value).then(function () {
        alert('Copied: ' + value);
      });
    }
  </script>
</body>
</html>

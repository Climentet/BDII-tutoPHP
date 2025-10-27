# Tutorial ràpid de PHP (BDII)

Aquest directori conté exemples senzills de PHP per aprendre i executar amb XAMPP. A continuació tens blocs de codi i una breu explicació de cada arxiu.

Requisits
- Windows amb XAMPP instal·lat.
- Carpeta `BDII` a `C:\xampp\htdocs\BDII`.

Com executar
1. Obre el Panell de Control de XAMPP i inicia Apache (i MySQL si cal).
2. Obre el navegador a `http://localhost/BDII/`.

Arxius principals i exemples
- `index.php` — pàgina d'inici amb exemples bàsics.
    ```php
    <?php
    // index.php
    echo "<h1>Hola, BDII</h1>";

    // Exemple: imprimir números de l'1 al 10
    for ($i = 1; $i <= 10; $i++) {
            echo "<p>Nombre: $i</p>";
    }
    ?>
    ```

- `a.php` — genera una llista del 1 al 10.
    ```php
    <?php
    // a.php
    echo "<h2>Llista del 1 al 10</h2>";
    echo "<ul>";
    for ($i = 1; $i <= 10; $i++) {
            echo "<li>$i</li>";
    }
    echo "</ul>";
    ?>
    ```

- `connect.php` — exemple de connexió a MySQL amb mysqli i prepared statements.
    ```php
    <?php
    // connect.php (exemple)
    $host = 'localhost';
    $user = 'usuari';
    $pass = 'contrasenya';
    $db   = 'bd';

    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_error) {
            die('Connexió error: ' . $mysqli->connect_error);
    }

    // Exemple d'statement preparat
    $stmt = $mysqli->prepare('SELECT nom FROM usuaris WHERE id = ?');
    $stmt->bind_param('i', $id);
    $id = 1;
    $stmt->execute();
    $stmt->bind_result($nom);
    if ($stmt->fetch()) {
            // Escapa la sortida per evitar XSS
            echo htmlspecialchars($nom, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    $stmt->close();
    $mysqli->close();
    ?>
    ```

- `styles.css` — estils bàsics.
    ```css
    /* styles.css */
    body {
            font-family: Arial, sans-serif;
            padding: 1rem;
            background: #f9f9f9;
            color: #222;
    }
    h1 { color: #333; }
    ul { margin-left: 1.5rem; }
    ```

Conceptes bàsics (breu)
- Bloc PHP: `<?php ... ?>`
- Imprimir: `echo "Hola";`
- Variables: `$nom = "Anna";`
- Comentaris PHP: `//`, `#`, `/* ... */`
- Escapament de sortida: `htmlspecialchars($valor, ENT_QUOTES, 'UTF-8')`

Bones pràctiques (resum)
- Utilitza sentències preparades per a consultes SQL (evita concatenar entrades a les consultes).
- No exposis credencials en repositoris ni en producció; usa variables d'entorn o fitxers fora del directori web.
- Valida i escapa l'entrada/ sortida (server-side). Per a sortida HTML, usa `htmlspecialchars`.
- Controla errors i registra'ls de forma segura (no mostris detalls sensibles a l'usuari).

Exemple ràpid d'ús d'statement preparat per inserir:
```php
<?php
// Inserir amb prepared statement
$stmt = $mysqli->prepare('INSERT INTO usuaris (nom, email) VALUES (?, ?)');
$stmt->bind_param('ss', $nom, $email);
$nom = 'Exemple';
$email = 'exemple@domini.cat';
$stmt->execute();
$stmt->close();
?>
```

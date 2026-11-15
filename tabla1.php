<?php
// 1. Configuramos los límites de la tabla.
$inicio = 50;       // Primer número que aparecerá como columna.
$fin = 60;          // Último número de las columnas (incluido).
$maxDivisor = 10;   // Último divisor que aparecerá como fila.
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabla de divisores (50–60)</title>
    <style>
        :root {
            color-scheme: dark;
            --bg: #141a18; --panel: #1d2622; --text: #e8eee8;
            --muted: #b7c3b9; --line: #435047; --orange: #e6a15b;
            --green: #a9cc91; --yellow: #e8cd7d;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0; padding: 24px 0; color: var(--text);
            background: radial-gradient(ellipse at 15% 0%, #25352c 0, transparent 42%), var(--bg);
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.6;
        }
        .container {
            width: min(900px, calc(100% - 32px)); margin: 20px auto;
            padding: clamp(18px, 4vw, 38px); background: var(--panel);
            border: 1px solid var(--line); border-radius: 18px;
        }
        h1 { color: var(--orange); line-height: 1.2; }
        .intro, .small { color: var(--muted); }
        .table-scroll { overflow-x: auto; padding: 8px; border: 1px solid var(--line); border-radius: 12px; background: #171f1b; }
        table { width: 100%; min-width: 650px; border-collapse: separate; border-spacing: 3px; text-align: center; }
        caption { padding: 8px 4px 12px; color: var(--muted); text-align: left; font-weight: 650; }
        th, td { min-width: 43px; padding: 9px 7px; border: 1px solid #566257; border-radius: 5px; }
        thead th { background: #51402f; color: #ffe0ae; }
        tbody th { position: sticky; left: 0; z-index: 1; background: #294235; color: #d8efc7; }
        .fila-impar td { background: #1b663c; }
        .fila-par td { background: #b6921d; }
        .divisible span { color: var(--green); font-size: 1.2rem; font-weight: 900; }
        .no-divisible span { color: var(--yellow); opacity: .72; }
        .legend { display: flex; flex-wrap: wrap; gap: 10px 20px; margin-top: 16px; color: var(--muted); }
        .legend strong { color: var(--green); }
        .foot { margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--line); color: var(--muted); font-size: .92rem; }
        code { color: var(--yellow); }
        @media (max-width: 600px) { .container { width: calc(100% - 18px); margin: 9px auto; padding: 16px 12px; } }
    </style>
</head>
<body>
<main class="container">
    <p class="small">EJERCICIO DE PHP </p>
    <h1>Tabla de divisores</h1>
    <p class="intro">
        Cada columna representa un número entre <?= $inicio ?> y <?= $fin ?>.
        Cada fila representa un posible divisor, desde 1 hasta <?= $maxDivisor ?>.
        El asterisco indica que la división es exacta.
    </p>

    <div class="table-scroll">
        <table>
            <caption>Divisibilidad de los números del <?= $inicio ?> al <?= $fin ?></caption>
            <thead>
                <tr>
                    <th scope="col">Divisor ↓ / Número →</th>
                    <?php for ($numero = $inicio; $numero <= $fin; $numero++): ?>
                        <th scope="col"><?= $numero ?></th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($divisor = 1; $divisor <= $maxDivisor; $divisor++): ?>
                    <tr class="<?= ($divisor % 2 === 0) ? 'fila-par' : 'fila-impar' ?>">
                        <th scope="row"><?= $divisor ?></th>
                        <?php for ($numero = $inicio; $numero <= $fin; $numero++): ?>
                            <?php
                            $esDivisible = ($numero % $divisor === 0);
                            $simbolo = $esDivisible ? '*' : '–';
                            $clase = $esDivisible ? 'divisible' : 'no-divisible';
                            $descripcion = $esDivisible
                                ? "El número $numero sí es divisible por $divisor"
                                : "El número $numero no es divisible por $divisor";
                            ?>
                            <td class="<?= $clase ?>" aria-label="<?= htmlspecialchars($descripcion, ENT_QUOTES, 'UTF-8') ?>">
                                <span><?= $simbolo ?></span>
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <div class="legend">
        <span><strong>*</strong> División exacta (resto 0)</span>
        <span><strong>–</strong> División no exacta (resto distinto de 0)</span>
    </div>
    
</main>
</body>
</html>
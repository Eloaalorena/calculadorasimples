<?php
$resultado = null;
$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero1 = isset($_POST['numero1']) ? $_POST['numero1'] : 0;
    $numero2 = isset($_POST['numero2']) ? $_POST['numero2'] : 0;
    $operacao = isset($_POST['operacao']) ? $_POST['operacao'] : '';

    // Validando se os números são válidos
    if (!is_numeric($numero1) || !is_numeric($numero2)) {
        $erro = 'Por favor, insira números válidos!';
    } else {
        switch ($operacao) {
            case 'soma':
                $resultado = $numero1 + $numero2;
                break;
            case 'subtracao':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicacao':
                $resultado = $numero1 * $numero2;
                break;
            case 'divisao':
                if ($numero2 == 0) {
                    $erro = 'Divisão por zero não é permitida!';
                } else {
                    $resultado = $numero1 / $numero2;
                }
                break;
            default:
                $erro = 'Operação inválida!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: pink;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculadora {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        input[type="number"], select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .resultado, .erro {
            font-size: 18px;
            margin-top: 20px;
        }

        .resultado {
            color: green;
        }

        .erro {
            color: red;
        }
    </style>
</head>
<body>

    <div class="calculadora">
        <h2>Calculadora Simples</h2>
        <form method="post">
            <input type="number" name="numero1" step="any" placeholder="Número 1" required>
            <input type="number" name="numero2" step="any" placeholder="Número 2" required>
            
            <select name="operacao" required>
                <option value="soma">Soma</option>
                <option value="subtracao">Subtração</option>
                <option value="multiplicacao">Multiplicação</option>
                <option value="divisao">Divisão</option>
            </select>
            
            <input type="submit" value="Calcular">
        </form>

        <?php if ($resultado !== null): ?>
            <div class="resultado">
                <h3>Resultado: <?php echo number_format($resultado,); ?></h3>
            </div>
        <?php elseif ($erro): ?>
            <div class="erro">
                <p><?php echo $erro; ?></p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
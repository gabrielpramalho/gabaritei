<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header{
            text-align: center;
            background-color: #999;
            border: 1px solid #000;
        }


        .col{
            content: "";
            margin-bottom: 30px;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            float: none;
            clear: both;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -ms-flex-line-pack: start;
            align-content: flex-start;
            flex-wrap: wrap;
        }

        .col-3,
        .col-4,
        .col-6,
        .col-9,
        .col-12 {
            -webkit-box-flex: 1;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }


        .col-3{
            width: 25%%;
        }

        .col-6{
            width: 30%;
        }

        .col-9{
            width: 75%;
        }

        .col-12{
            width: 100%;
        }

        .inst div{
            border: 1px solid #000;
            display: inline-block;
        }

        .border{
            border: 1px solid #000;
        }

        .inst{
            padding-top: 30px;
        }
        .inst div:first-child{

            height: 50px;
            width: 280px;
            padding: 30px;
        }

        .inst div:last-child{
            width: 280px;
            font-size: 12px;
            padding: 0 36px;
        }

        .inst img{
            margin-left: 60px;
        }

        .ass{
            text-align: center;
            position: relative;
            height: 100px;
        }

        .ass p{
            position: absolute;
            top: 0;
            margin: 0;
        }

        .gabarito{
            margin-top: 30px;
        }
        .gabarito img{
            width: 718px;
            height: 642px;
        }
        
        
    </style>
</head>
<body>
    @for ($i = 0; $i < $qtd[0]; $i++)
    <header>
        <div class="">
            <h3 class="col-12">Cartão-resposta</h3>
        </div>
        
    </header>
    <div class=" inst">
        <div>

            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();

            $cod = rand(1, 99999);
            $cod = str_pad($cod, 5, "0", STR_PAD_LEFT);
            $bar_code   = $generator->getBarcode($cod, $generator::TYPE_CODABAR);
            $img_base64 = base64_encode($bar_code);
            echo '<img src="data:image/png;base64,' . $img_base64 . '">';


            ?>
        </div>
        <div>
            <ul>

                <li>Verifique seus dados impressos e assine após a conferência.</li>
                <li>Utilize uma marca para cada questão, preenchendo todo o quadrículo.</li>
                <li>A marcação indevida anula a resposta dada na questão.</li>

            </ul>
        </div>
    </div>

    <div class="ass border" >
        <p>Assinatura</p>
    </div>

    <div class="gabarito">

        <!-- 3 colunas -->
        <img src="https://i.postimg.cc/2jvcYYLP/gabarito.png" alt="">
        <!-- 2 colunas -->
        <!-- <img src="https://i.postimg.cc/43NNySz0/gabarito-coluna-2.png" alt=""> -->
        <!-- 1 colunas -->
        <!-- <img src="https://i.postimg.cc/Jn5mM3Fq/gabarito-coluna-1.png" alt=""> -->


        
    </div>
    
    <div>
        <p><?php echo $cod; ?></p>
    </div>
    @endfor
</body>

</html>


<!doctype html>
<html>
<head>
    <style>
        body{
            max-width: 900px;
            overflow: hidden;
            font-size: 17px;
            margin:0 auto;
            overflow-y: scroll;
        }
        .mail-body{
            max-width: 900px;
            overflow: hidden;
            margin:0 auto;
        }
        .header{
            width: 100%;
            background-color: #9D968D;
            color: white;
            padding: .5rem;
            max-width: 100%;
            overflow: hidden;
            box-sizing: border-box;
        }
        .divider{
            display: block;
            position: relative;
            width: 100%;
            height: .8rem;
            background-color: #6E6259;
            max-width: 100%;
            overflow: hidden;

            /*margin-top: 1rem;*/
        }
        .mail-foot{
            background-color: #9D968D;
            color: white;
            line-height: 50px;
            width: 100%;

        }
        p{
            font-family: "Times New Roman", Times, serif, Tahoma, Arial;
            font-size: 17px;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .small-text{
            font-size: 14px;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .button{
            display: block;
            position: relative;
            padding: 1rem;
            background-color: #9D968D;
            color: #ffffff;
            text-decoration: none;
            margin: 0 auto;
            max-width: fit-content;
            font-size: 30px;
            border:2px solid #6e6259;
        }
        pre{
            text-wrap: auto;
        }
    </style>
</head>
<body>
<div class="mail-body">

    {!! html_entity_decode($emailContent) !!}

</div>
</body>
</html>

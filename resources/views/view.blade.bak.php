<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-<span></span>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codeplay.buzz</title>
    <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/babel-standalone@latest/babel.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,00,00,00&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <script src="https://unpkg.com/react-bootstrap@next/dist/react-bootstrap.min.js" crossorigin></script>
    <script src="//cdn.jsdelivr.net/npm/phaser@3.23.0/dist/phaser.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
        body {
            text-align: center;
        }

        .code p {
            margin: 0;
            font-size: 6px;
        }

        p span {
            width: 10px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div id="app"></div>
</body>
<script type="text/babel">
    const { useState, useEffect, useContext } = React;
    const {Navbar,Nav,NavDropdown,Form,FormControl,Button} = ReactBootstrap;
</script>
<script type="text/babel" src="/jsx/top.jsx"></script>
<script type="text/babel" src="/jsx/head.jsx"></script>
<script type="text/babel" src="/jsx/pix.jsx"></script>
<script type="text/babel" src="/jsx/footer.jsx"></script>
<script type="text/babel">
    function View(){
        let css={
            margin:'10px'
        }
        let code={
            width:'120px',
            margin: '0 auto',
            textAlign: 'center',
            letterSpacing: '2px'
        }
            return(
                <div>
                    <h1>{{ $pix->title }}</h1>
                    <p><a href="/{{ $pix->user_name }}">{{ $pix->user_name }}</a> 创建于 {{ $pix->time }} </p>
                    <p>被访问{{ $pix->view }}次</p>

                    <h3>canvas:</h3>
                    <Pix code="{!! $pix->code !!}" />
                    <h3>code:</h3>
                    <p style={code}>{{ $pix->code }}</p>

                    <p>&nbsp;</p>
                    <Button variant="primary" href="/fork/{{ $pix->pix_id }}">
                        fork
                    </Button>
                    &nbsp;
                    <Button variant="primary" href="/new">
                        create new
                    </Button>
                </div>
            )
    }

    ReactDOM.render(
        <div>
        <Top />
        <View />
        <Footer/>
        </div>,
        document.getElementById('app')
    );
</script>

</html>

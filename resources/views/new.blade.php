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
    <script crossorigin src="https://unpkg.com/@material-ui/core@latest/umd/material-ui.production.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/phaser@3.23.0/dist/phaser.min.js"></script>
    <script crossorigin src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
        .MuiInput-input{
            letter-spacing: 5px;
        }
    </style>
</head>

<body>
    <div id="app"></div>
</body>
<script type="text/babel" src="/jsx/head.jsx"></script>
<script type="text/babel" src="/jsx/footer.jsx"></script>
<script type="text/babel">
    const {
    colors,
    CssBaseline,
    ThemeProvider,
    Container,
    makeStyles,
    createMuiTheme,
    Box,
    SvgIcon,
    Link,
    Button,
    Avatar,
    AppBar,
    Toolbar,
    IconButton,
    MenuIcon,
    Typography,
    Card,
    CardActionArea,
    CardMedia,
    CardContent,
    CardActions,
    List,
    ListSubheader,
    ListItem,
    ListItemText,
    TextField
    } = MaterialUI;

    const theme = createMuiTheme({
    palette: {
        primary: {
        main: '#556cd6',
        },
        secondary: {
        main: '#19857b',
        },
        error: {
        main: colors.red.A400,
        },
        background: {
        default: '#fff',
        },
    },
    });

    function Nav(){
        return(
            <AppBar position="static">
                <Toolbar>
                    @if(session()->get('user'))
                    <Avatar alt="" src="{{ session()->get('user')->avatar }}" />
                    <Typography variant="h6">
                        &nbsp;&nbsp;&nbsp;{{ session()->get('user')->name }}
                    </Typography>
                    <Button color="inherit" href="/logout">退出</Button>
                    @else
                    <Button color="inherit" href="/login">登陆</Button>
                    @endif
                </Toolbar>
            </AppBar>
        );
    }

    function App() {
        const name = 'codeplay.buzz';
        const css={
            textAlign:'center',
        }
        return (
            <Container maxWidth="sm">
            <div class="code" style={css}>

            </div>
            </Container>
        );
    }

    class PixEdit extends React.Component {
        constructor() {
            super();
            this.state = {
                code: `{!! $code !!}`,
                title:''
            };
        }
        titleChange(e){
            this.setState({
                title:e.target.value
            })
            console.log(this.state.code)
        }
        handleChange(e){
            this.setState({
                code:e.target.value
            })
            console.log(this.state.code)
        }
        post(){
            let title=this.state.title;
            let code=this.state.code;
            console.log('code:',code)
            console.log('post');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                url: '/pix',
                dataType: 'json',
                type: 'POST',
                data: {
                    'title':title,
                    'code': code,
                },
                success: function(data) {
                    console.log(data);
                    if (data.err) {
                        console.log(data.err);
                    } else {
                        window.location.href = '/';
                    }
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(null, status, err.toString());
                }.bind(this)
            });
        }
        render() {
            let css={
                margin:'10px'
            }
            let code={
                width:'120px',
                margin: '0 auto',
                textAlign: 'center',
                letterSpacing: '2px'
            }
            let text={
                    letterSpacing: '5px'
            }
            return(
                <div>
                    <h1><TextField id="title" onChange={this.titleChange.bind(this)} value={this.state.title} label="标题" /></h1>
                    <h3>code:</h3>
                    <TextField
                        id="code"
                        label="代码"
                        multiline
                        rowsMax={10}
                        value={this.state.code}
                        onChange={this.handleChange.bind(this)}
                    />
                    <p>
                        <Pix key={this.state.code} code={this.state.code} />
                    </p>
                    <p>
                        <Button variant="contained" onClick={this.post.bind(this)} color="primary">post</Button>
                    </p>

                </div>
            )
        }
    }

    class Pix extends React.Component {
        constructor(props) {
            super(props);
            console.log(props.code)
            let c=[]
            try{
                let c = eval(`[${props.code}]`)
                this.state = {
                    code:c
                };
            }catch(error){

            }
        }
        draw(){


            let _self=this;
            let width=200;
            let height=200;
            var config = {
                    type: Phaser.CANVAS,
                    parent: 'canvas',
                    width: width,
                    height: height,
                    backgroundColor: '#fff',
                    scene: {
                        create: create
                    }
            };

            var game = new Phaser.Game(config);
            function create (){
                var pixelWidth = 10;
                var pixelHeight = 10;
                this.textures.generate('pix', { data: _self.state.code, pixelWidth: pixelWidth });
                this.add.image(width/2,height/2, 'pix');
                // let player = this.add.sprite(width/2,height/2, 'pix');
            }
        }
        componentDidMount(){
            this.draw()
        }
        render() {
            let css={
                margin:'10px'
            }
            return(
                <div style={css} id="canvas"></div>
            )
        }
    }

    ReactDOM.render(
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <Nav />
            <Head />
            <PixEdit />
            <Footer />
        </ThemeProvider>,
        document.getElementById('app')
    );
</script>

</html>

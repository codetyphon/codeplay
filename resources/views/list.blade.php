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
    StyledMenu,
    StyledMenuItem,
    Menu,
    MenuItem
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
    class Nav extends React.Component {
        render(){
            return(
                <AppBar position="static">
                    <Toolbar>
                        @if(session()->get('user'))
                        <Typography variant="h6">
                            &nbsp;&nbsp;&nbsp;{{ session()->get('user')->name }}
                        </Typography>
                        <Avatar alt="" src="{{ session()->get('user')->avatar }}" />
                        <Button color="inherit" href="/new">创作</Button>
                        <Button color="inherit" href="/logout">退出</Button>
                        @else
                        <Button color="inherit" href="/login">登陆</Button>
                        @endif
                    </Toolbar>
                </AppBar>
            );
        }
    }

    function App() {
        const name = 'codeplay.buzz';
        const css={
            textAlign:'center',
        }
        return (
            <Container maxWidth="sm">
            <div class="code" style={css}>
                <h1>welcome to {name}</h1>
                <p>一个使用字符串创作像素图的社区</p>
                <p>&nbsp;</p>
                <Card>
                    <CardActionArea>
                        <CardMedia
                        image="{{ $user->avatar }}"
                        title="{{ $user->name }}"
                        />
                        <CardContent>
                        <Typography gutterBottom variant="h5" component="h2">
                            {{ $user->name }}
                        </Typography>
                        </CardContent>
                    </CardActionArea>
                    <CardActions>
                    {{ $user->bio }}
                    </CardActions>
                </Card>
                <List subheader={<li />}>
                @foreach($pixs as $pix)
                    <ListItem key="{{ $pix->id }}">
                        <a href="/pix/{{ $pix->id }}">
                            <ListItemText primary="{{ $pix->title }}" />
                        </a>
                    </ListItem>
                @endforeach
                </List>
                <p>{!! $pixs->links() !!}</p>

            </div>
            </Container>
        );
    }

    ReactDOM.render(
        <ThemeProvider theme={theme}>
            <CssBaseline />
            <Nav />
            <App />
            <Footer />
        </ThemeProvider>,
        document.getElementById('app')
    );
</script>

</html>

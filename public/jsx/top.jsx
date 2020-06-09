function NavUser(props) {
    return (
        <Nav className="mr-auto">
            <Nav.Link href="/new">创建</Nav.Link>
            {/* <img src={user.avatar} /> */}
            <NavDropdown title={props.user.name} id="basic-nav-dropdown">
                <NavDropdown.Item href={'/' + props.user.name}>我的主页</NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item href="/logout">退出</NavDropdown.Item>
            </NavDropdown>
        </Nav>
    )
}
function NavNoUser() {
    return (
        <Nav className="mr-auto">
            <Nav.Link href="/login">登录</Nav.Link>
        </Nav>
    )
}
function Top() {
    const [user, setUser] = useState(null);
    useEffect(() => {
        $.getJSON("/json/user", function (data) {
            console.log('data',data)
            if(data!=false){
                setUser(data);
            }
        });
    }, []);
    return (
        <Navbar bg="light" expand="lg">
            <Navbar.Brand href="/discover">发现</Navbar.Brand>
            <Navbar.Toggle aria-controls="basic-navbar-nav" />
            <Navbar.Collapse id="basic-navbar-nav">
                {user != null ? <NavUser user={user} /> : <NavNoUser />}
            </Navbar.Collapse>
        </Navbar>
    )
}

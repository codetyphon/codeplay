function PixEdit(props) {
    const [code, setCode] = useState('');
    const [title, setTitle] = useState('');
    const [token, setToken] = useState('');
    const [open, setOpen] = useState(false);
    const [msg, setMsg] = useState('');

    useEffect(() => {
        setToken(props.token);
        setTitle(props.title);
        setCode(props.code);
    }, []);

    let titleChange = (e) => {
        setTitle(e.target.value);
    }
    let handleChange = (e) => {
        setCode(e.target.value)
    }
    let handleClose = () => {
        setOpen(false);
    }
    let post = () => {
        setOpen(true);
        setMsg("正在提交中，提交结束后会自动返回。")
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        $.ajax({
            url: '/pix',
            dataType: 'json',
            type: 'POST',
            data: {
                'title': title,
                'code': code,
            },
            success: function (data) {
                console.log(data);
                if (data.err) {
                    console.log(data.err);
                    setOpen(true);
                    setMsg("需要登陆，才能提交");
                } else {
                    window.location.href = '/';
                }
            }.bind(this),
            error: function (xhr, status, err) {
                console.error(null, status, err.toString());
            }.bind(this)
        });
    }

    // let css = {
    //     margin: '10px'
    // }
    // let code = {
    //     width: '120px',
    //     margin: '0 auto',
    //     textAlign: 'center',
    //     letterSpacing: '2px'
    // }
    // let text = {
    //     letterSpacing: '5px'
    // }
    return (
        <div>
            <h1>
                <FormControl
                    onChange={titleChange}
                    value={title}
                    placeholder="title"
                /></h1>
            <h3>code:</h3>
            <FormControl className="edit" as="textarea" rows="10" aria-label="With textarea" value={code} onChange={handleChange} />
            <p>
                <br></br>
                <Pix key={code} code={code} />
            </p>
            <p>
                <Modal show={open} onHide={handleClose}>
                    <Modal.Header closeButton>
                        <Modal.Title>提示</Modal.Title>
                    </Modal.Header>
                    <Modal.Body>{msg}</Modal.Body>
                    <Modal.Footer>

                        <Button variant="primary" onClick={handleClose}>
                            ok
          </Button>
                    </Modal.Footer>
                </Modal>

                <Button variant="primary" onClick={post}>post</Button>
            </p>
        </div>
    )

}

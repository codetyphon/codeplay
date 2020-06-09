function PixEdit(props) {
    let s = props.size ? props.size : 10;
    let t = props.title ? props.title : '未命名';
    const [code, setCode] = useState('');
    const [title, setTitle] = useState(t);
    const [token, setToken] = useState('');
    const [open, setOpen] = useState(false);
    const [msg, setMsg] = useState('');
    const [size, setSize] = useState(s);

    useEffect(() => {
        setToken(props.token);
        setCode(props.code);
    }, []);

    let titleChange = (e) => {
        setTitle(e.target.value);
    }
    let sizeChange = (e) => {
        setSize(e.target.value);
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
                'size': size
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

    return (
        <div>
            <InputGroup className="mb-3">
                <InputGroup.Prepend>
                    <InputGroup.Text>作品标题</InputGroup.Text>
                </InputGroup.Prepend>
                <FormControl
                    onChange={titleChange}
                    value={title}
                    placeholder="title"
                />

            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Prepend>
                    <InputGroup.Text>像素尺寸</InputGroup.Text>
                </InputGroup.Prepend>
                <FormControl
                    onChange={sizeChange}
                    value={size}
                    placeholder="size"
                />
            </InputGroup>
            <InputGroup className="mb-3">
                <InputGroup.Prepend>
                    <InputGroup.Text>画布尺寸</InputGroup.Text>
                </InputGroup.Prepend>
                <FormControl
                    value={200}
                    readonly
                    disabled
                />
            </InputGroup>
            <p>颜色代码：数字0-9，大写字母A到G，以及标点符号. </p>
            <p>每组代码之间必须有,相隔。</p>
            <div className="flex">
                <FormControl className="edit" as="textarea" rows="10" aria-label="With textarea" value={code} onChange={handleChange} />
                <Pix key={Date.now()} size={size} id={props.id} code={code} />
            </div>

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
            <p>
                <br></br>
                <Button variant="primary" onClick={post}>post</Button>
            </p>
        </div>
    )

}

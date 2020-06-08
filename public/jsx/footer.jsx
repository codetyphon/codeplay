function Footer(){
    const [users, setUsers] = useState(0);
    const [pixs, setPixs] = useState(0);
    useEffect(() => {
        $.getJSON("/json/info", function (data) {
            setUsers(data.users);
            setPixs(data.pixs);
        });
    }, []);
    return (
        <div>
            <p>2020 开放版权，欢迎山寨。</p>
            <p>已有<b>{users}</b>人创作<b>{pixs}</b>幅作品</p>
            <p><a href="/about">关于</a> <a target="_blank" href="https://support.qq.com/products/163023/">反馈</a></p>
        </div>
    );
}

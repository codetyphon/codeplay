class Head extends React.Component {
    constructor() {
        super();
        this.state = {
            users: 0,
            pixs: 0
        };
    }
    componentDidMount() {
        let _self = this;
        $.getJSON("/json/info", function (data) {
            _self.setState({
                users: data.users,
                pixs: data.pixs
            });
        });
    }
    render() {
        return (
            <div>
                <h1>codeplay.buzz</h1>
                <p>一个使用字符串创作像素图的社区</p>
                <p>已有<b>{this.state.users}</b>人创作<b>{this.state.pixs}</b>幅作品</p>
            </div>
        );
    }
}

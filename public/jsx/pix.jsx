function Pix(props) {
    const [date, setDate] = useState(Date.now());
    // let s = props.size ? props.size : 10;
    const [size, setSize] = useState(props.size);
    console.log(props);
    useEffect(() => {
        let w = 200;
        let h = 200;
        setDate(Date.now());
        var config = {
            type: Phaser.CANVAS,
            parent: 'canvas_' + props.id + "_" + date,
            width: w,
            height: h,
            backgroundColor: '#fff',
            scene: {
                create: create
            }
        };
        var game = new Phaser.Game(config);
        function create() {
            this.textures.generate('pix', { data: eval(`[${props.code}]`), pixelWidth: size, pixelHeight: size });
            this.add.image(w / 2, h / 2, 'pix');
        }
    }, []);
    return (
        <div id={"canvas_" + props.id + "_" + date}></div>
    )
}

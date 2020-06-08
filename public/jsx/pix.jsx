function Pix(props) {
    console.log(props.code);
    useEffect(() => {
        let width = 200;
        let height = 200;
        var config = {
            type: Phaser.CANVAS,
            parent: 'canvas_'+props.id,
            width: width,
            height: height,
            backgroundColor: '#fff',
            scene: {
                create: create
            }
        };
        var game = new Phaser.Game(config);
        function create() {
            var pixelWidth = 10;
            var pixelHeight = 10;
            this.textures.generate('pix', { data: eval(`[${props.code}]`), pixelWidth: pixelWidth });
            this.add.image(width / 2, height / 2, 'pix');
        }
    }, []);
    return (
    <div id={"canvas_"+props.id}></div>
    )
}

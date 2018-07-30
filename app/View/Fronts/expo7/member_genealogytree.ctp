<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content" style="padding-left: 0px;">
            <div id="genealogytree" style="background-color: #FAFAFA; border: solid 1px black; height: 650px; bottom: 50px;"></div>
        </div>
    </div>
</div>
<script>
    var testdata = <?= json_encode($tree) ?>;
    $(document).ready(function () {
        var $GRAPH = go.GraphObject.make;
        myDiagram =
                $GRAPH(go.Diagram, "genealogytree", // must be the ID or reference to div
                        {
                            initialContentAlignment: go.Spot.Center,
                            "undoManager.isEnabled": true, // enable undo & redo
                            layout: $GRAPH(go.TreeLayout, // specify a Diagram.layout that arranges trees
                                    {angle: 90, layerSpacing: 100})
                        });
        myDiagram.nodeTemplate =
                $GRAPH(go.Node, "Spot",
                        $GRAPH(go.Panel, "Vertical",
                                $GRAPH(go.Panel, "Spot",
                                        $GRAPH(go.Shape, "RoundedRectangle", { width:100, height:45, stroke: "#E6E6E6", strokeWidth: 1, fill: "white" },
                                                ),
                                        $GRAPH(go.Panel, "Vertical",
                                                $GRAPH(go.TextBlock,
                                                {margin: 4, stroke: "red", font: "bold 12px Tahoma"},
                                                        new go.Binding("text", "name")
                                                        ),
                                                $GRAPH(go.TextBlock,
                                                {margin: 0, stroke: "#999999", font: "bold 10px Tahoma"},
                                                        new go.Binding("text", "id")
                                                        ),
                                                ),
                                        ),
                                $GRAPH(go.Picture,
                                {margin: 0, width: 100, height: 115, background: "gray"},
                                        new go.Binding("source")),
                                ),
                        $GRAPH(go.Panel, "Spot", {alignment: new go.Spot(0, 0, 100, 165)},
                                $GRAPH(go.Shape, "Ellipse",
                                {fill: "#0D9CD4", width: 40, height: 40, stroke: null, visible: true},
                                        ),
                                $GRAPH(go.TextBlock, "...",
                                {margin: 12, stroke: "white", font: "bold 16px Tahoma"},
                                        new go.Binding("text", "total_child"))
                                ),
                        $GRAPH(go.Panel, "Spot", {alignment: new go.Spot(0, 0, 0, 165)},
                                $GRAPH(go.Shape, "Ellipse",
                                {fill: "#0D9CD4", width: 40, height: 40, stroke: null, visible: false},
                                        ),
                                ),
                        );
                var myModel = $GRAPH(go.TreeModel);
        myModel.nodeDataArray = testdata;
        myDiagram.model = myModel;
        myDiagram.toolManager.draggingTool.isEnabled = false;
        myDiagram.toolManager.dragSelectingTool.isEnabled = false;
        myDiagram.linkTemplate =
                $GRAPH(go.Link, go.Link.Orthogonal,
                        {corner: 5, relinkableFrom: false, relinkableTo: false},
                $GRAPH(go.Shape, {strokeWidth: 4, stroke: "#0D9CD4"}));
    })
</script>
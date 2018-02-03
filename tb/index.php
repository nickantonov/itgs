
<!DOCTYPE HTML>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../system.tb/ext-all-gray-debug.css" />
<script src="../system/tb/ext-all-dev.js"></script>
</head>
<body>
<script type="text/javascript">
var store = Ext.create('Ext.data.TreeStore', {
    fields:['text','Ячейка', 'Тип', 'Название', 'Картинка', 'PDF', 'Количество', 'Характеристики', 'Описание', 'Цена', 'Где купить'],
    root: {
        text: 'CMD',
        expanded: true,
        children: [
            {
                text: 'Child 1',
                field1:'УГАГА',
                leaf: true
            },
            {
                text: 'Child 2',
                field2:'УГУГУГ',
                leaf: true
            }
           
        ]
    }
});

Ext.define('TreePanel1', {
    extend: '"RADCOMSPACE" V 1.0',

    height: 250,
    title: '"RADCOMSPACE" V 1.0',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            store: store,
            plugins:[
            Ext.create('Ext.grid.plugin.CellEditing')
            ],
            columns: [
                {
                    xtype: 'treecolumn',
                    dataIndex: 'text',
                    flex: 1,
                    text: 'Дерево',
                    editor:'textfield'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'Ячейка',
                    text: 'Ячейка',
                    editor:'combobox'
                },
                {
                    xtype: 'datecolumn',
                    dataIndex: 'field2',
                    text: 'Field2',
                    editor:'datefield'
                }
            ]
        });

        me.callParent(arguments);
    }
});

var tp = new TreePanel1({renderTo:Ext.getBody()});



</script>


<script type="text/javascript">
Ext.onReady(function(){
    var menustore = Ext.create('Ext.data.TreeStore', {
        root: {
            text:"Языки программирования",
            expanded: true,
            children: [{
            text: "C#",
            leaf: true
            },{
            text: "C++",
            leaf: true
            },{
            text: "Java",
            leaf: true
            }]
        }
    });
    var tree = Ext.create('Ext.tree.Panel', {
        title: 'Языки программирования',
        store: menustore,
        width: 170,
        rootVisible: false,
        region: 'west'
    });
    var centerPanel=Ext.create('Ext.panel.Panel', {
        title: 'Добавить/Удалить узел',
        region: 'center',
        bodyPadding:10,
        items:[{
            xtype: 'textfield',
            id: 'txt',
            height: 20,
         },{
            xtype: 'button',
            width:60,
            height: 20,
            text:'Добавить',
            handler: function() {
                // получаем введенное в текстовое поле значение
                var newNode=centerPanel.getComponent('txt').getValue();
                // Используем метод appendChild для добавления нового объекта
                tree.getRootNode().appendChild({
                    text: newNode,
                    leaf: true
                });
            }
        },{
            xtype: 'button',
            width:60,
            height: 20,
            margin: '0 0 0 20',
            text:'Удалить',
            handler: function() {
                // получаем выделенный узел для удаления
                var selectedNode=tree.getSelectionModel().getSelection()[0];
                // если таковой имеется, то удаляем
                if(selectedNode)
                {
                    selectedNode.remove(true);
                }
            }
        }]
    });
    Ext.create('Ext.panel.Panel', {
        layout : 'border',
        width: 400,
        height: 180,
        padding:10,
        items : [tree, centerPanel],
        renderTo: Ext.getBody()
    });
    
});
</script>

<script type="text/javascript">
    
Ext.onReady(function() {
    
    var store = Ext.create('Ext.data.TreeStore', {
            proxy: {
                type: 'ajax',
                url: 'Nodes.php'
                },
            root: {
                text: 'TaskTree',
                id: 'RId',
                expanded: true
                },
            storeId: 'MyStore',
            folderSort: true,
            sorters: [{
                property: 'text',
                direction: 'ASC'
                }],
            listeners: {
                load: {
                    fn: function(stor, rec, res){
                        console.log(stor);
                        console.log(rec);
                        console.log(res);
                        }
                    }
                }
            });
                
    
    var tree = new Ext.tree.TreePanel({
        id: 'tree',
        store: store,
        useArrows: true,
        editable: true,
        animate: true,
        autoScroll: true,
        });
     
     new Ext.window.Window({
        title: 'Window for Tree',
        height: 200,
        width: 250,
        items: [tree]
    }).show();
    
    
});

</script>

<?php

class TreeNode {
     
        public $text = "";
        public $id = "";
        public $iconCls = "";
        public $leaf = true;
        public $draggable = false;
        public $href = "#";
        public $hrefTarget = "";
     
        function  __construct($id,$text,$iconCls,$leaf,$draggable,
                $href,$hrefTarget) {
     
            $this->id = $id;
            $this->text = $text;
            $this->iconCls = $iconCls;
            $this->leaf = $leaf;
            $this->draggable = $draggable;
            $this->href = $href;
            $this->hrefTarget = $hrefTarget;
        }
    }
     
    class TreeNodes {
     
        protected $nodes = array();
     
        function add($id,$text,$iconCls,$leaf,$draggable,
            $href,$hrefTarget) {
     
            $n = new TreeNode($id,$text,$iconCls,$leaf,
                    $draggable,$href,$hrefTarget);
     
            $this->nodes[] = $n;
        }
     
        function toJson() {
            return json_encode($this->nodes);
        }
    }
    
$requestedNode = "";
     
    if (isset($_REQUEST["node"])) {
        $requestedNode = $_REQUEST["node"];
    }
    $treeNodes = new TreeNodes();
     
    //if ('rootId' == $requestedNode) {
        $treeNodes->add("node-datasources","Datasources","",false,false,"","");
        $treeNodes->add("node-reports","Reports","",false,false,"","");
    /*} else if ('node-datasources' == $requestedNode) {
        $treeNodes->add("employees-system-node","Employee Management System","datasource",true,false,"","");
        $treeNodes->add("customers-system-node","Customer Management System","datasource",true,false,"","");
        $treeNodes->add("order-system-node","Order Processing System","datasource",true,false,"","");
    } else if ('node-reports' == $requestedNode) {
        $treeNodes->add("time-report-node","Time and Attendance","report",true,false,"","");
        $treeNodes->add("orders-by-quarter-report-node","Orders By Quarter","report",true,false,"","");
        $treeNodes->add("customers-trends-report-node","Customer Trends","report",true,false,"","");
    }
     */
    echo $treeNodes->toJson();
?>
</body>
</html>
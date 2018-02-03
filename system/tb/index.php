
<!DOCTYPE HTML>
<title></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="//extjs.cachefly.net/ext-4.1.0-gpl/resources/css/ext-all-gray-debug.css" />
<script src="//extjs.cachefly.net/ext-4.1.0-gpl/ext-all-dev.js"></script>
</head>
<body>
<script type="text/javascript">
var store = Ext.create('Ext.data.TreeStore', {
    fields:['text','field1', 'field2'],
    root: {
        text: 'Root',
        expanded: true,
        children: [
            {
                text: 'Child 1',
                field1:'hello',
                leaf: true
            },
            {
                text: 'Child 2',
                field2:'2012-07-20',
                leaf: true
            }
           
        ]
    }
});

Ext.define('TreePanel1', {
    extend: 'Ext.tree.Panel',

    height: 250,
    title: 'My Tree Grid Panel',

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
                    text: 'Nodes',
                    editor:'textfield'
                },
                {
                    xtype: 'gridcolumn',
                    dataIndex: 'field1',
                    text: 'Field1',
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

</body>
</html>
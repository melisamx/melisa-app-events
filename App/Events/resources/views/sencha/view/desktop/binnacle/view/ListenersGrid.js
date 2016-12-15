Ext.define('Melisa.events.view.desktop.binnacle.view.ListenersGrid', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.eventsbinnacleviewlistenersgrid',
    
    emptyText: 'No hay listeners registrados',
    deferEmptyText: true,
    header: {
        title: 'Listeners',
        titlePosition: 1,
        items: [
            {
                xtype: 'button',
                itemId: 'btnViewEvents',
                iconCls: 'x-fa fa fa-chevron-left',
                tooltip: 'Ver eventos',
                ui: 'transparent',
                style: 'margin-right: 20px'
            }
        ]
    },
    columns: [
        {
            width: 100,
            dataIndex: 'id',
            align: 'center',
            hidden: true,
            text: 'Id'
        },
        {
            flex: 1,
            dataIndex: 'module',
            text: 'Modulo'
        },
        {
            width: 100,
            dataIndex: 'status',
            align: 'center',
            text: 'Estatus'
        },
        {
            xtype: 'datecolumn',
            width: 180,
            dataIndex: 'createdAt',
            align: 'center',
            format: 'd/m/y h:i:s a',
            text: 'Fecha creación'
        },
        {
            xtype: 'datecolumn',
            width: 140,
            dataIndex: 'updatedAt',
            align: 'center',
            format: 'd/m/y h:i:s a',
            text: 'Fecha modificación',
            hidden: true
        }
    ],
    selModel: {
        selType: 'checkboxmodel'
    },
    listeners: {
        selectionchange: 'onSelectionchangeListenersGrid'
    }
    
});

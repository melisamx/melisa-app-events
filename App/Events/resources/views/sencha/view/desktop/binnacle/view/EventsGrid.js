Ext.define('Melisa.events.view.desktop.binnacle.view.EventsGrid', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.eventsbinnaclevieweventsgrid',
    
    emptyText: 'No hay eventos registrados',
    deferEmptyText: true,
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
            dataIndex: 'event',
            text: 'Evento'
        },
        {
            flex: 1,
            dataIndex: 'eventDescription',
            text: 'Evento descripción'
        },
        {
            flex: 1,
            dataIndex: 'identity',
            text: 'Emitido por'
        },
        {
            width: 190,
            dataIndex: 'status',
            align: 'center',
            text: 'Estatus'
        },
        {
            xtype: 'checkcolumn',
            flex: 1,
            dataIndex: 'processed',
            align: 'center',
            text: 'Procesado'
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
            dataIndex: 'processedAt',
            align: 'center',
            format: 'd/m/y h:i:s a',
            text: 'Fecha procesado',
            hidden: true
        }
    ],
    selModel: {
        selType: 'checkboxmodel'
    },
    listeners: {
        selectionchange: 'onSelectionchangeEventsGrid',
        itemdblclick: 'onItemdblclickEventsGrid'
    },
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true
    }
    
});

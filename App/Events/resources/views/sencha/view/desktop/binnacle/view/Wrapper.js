Ext.define('Melisa.events.view.desktop.binnacle.view.Wrapper', {
    extend: 'Ext.panel.Panel',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.events.view.desktop.binnacle.view.EventsGrid',
        'Melisa.events.view.desktop.binnacle.view.ListenersGrid',
        'Melisa.events.view.desktop.binnacle.view.WrapperController',
        'Melisa.events.view.universal.binnacle.view.WrapperModel'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'eventsbinnacleviewwrapper',
    cls: 'app-binnacle-view',
    layout: 'border',
    iconCls: 'x-fa fa-bolt',
    viewModel: {
        type: 'eventsbinnacleview'
    },
    items: [
        {
            xtype: 'container',
            reference: 'conPaneles',
            region: 'center',
            layout: 'card',
            items: [
                {
                    xtype: 'eventsbinnaclevieweventsgrid',
                    bind: {
                        store: '{events}'
                    }
                },
                {
                    xtype: 'eventsbinnacleviewlistenersgrid',
                    region: 'center',
                    bind: {
                        store: '{listeners}'
                    }
                }
            ]
        },
        {
            xtype: 'panel',
            reference: 'panDetalles',
            region: 'east',
            title: 'Data del evento',
            tpl: '<pre>{data}</pre>',
            split: true,
            collapsible: true,
            scrollable: true,
            collapsed: true,
            width: 400,
            bodyPadding: 10
        }
    ]
    
});
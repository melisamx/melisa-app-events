Ext.define('Melisa.events.view.desktop.binnacle.view.Wrapper', {
    extend: 'Ext.panel.Panel',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.events.view.desktop.binnacle.view.EventsGrid',
        'Melisa.events.view.desktop.binnacle.view.ListenersGrid',
        'Melisa.events.view.desktop.binnacle.view.WrapperController'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'eventsbinnacleviewwrapper',
    cls: 'app-binnacle-view',
    viewModel: {
        data: {
            event: {}
        },
        stores: {
            events: {},
            listeners: {}
        }
    },
    layout: 'border',
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
            split: true,
            collapsible: true,
            width: 400,
            bodyPadding: 10,
            scrollable: true,
            collapsed: true,
            tpl: '<pre>{data}</pre>'
        }
    ]
    
});
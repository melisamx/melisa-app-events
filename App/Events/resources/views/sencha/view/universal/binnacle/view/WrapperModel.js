Ext.define('Melisa.events.view.universal.binnacle.view.WrapperModel', {
    extend: 'Ext.app.ViewModel',        
    alias: 'viewmodel.eventsbinnacleview',
    
    stores: {
        events: {
            autoLoad: true,
            remoteFilter: true,
            remoteSort: true,
            proxy: {
                type: 'ajax',
                url: '{modules.events}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        listeners: {
            autoLoad: false,
            remoteFilter: true,
            remoteSort: true,
            proxy: {
                type: 'ajax',
                url: '{modules.listeners}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            },
            filters: [
                {
                    property: 'idBinnacle',
                    value: '{events.id}'
                }
            ]
        }
    }
    
});

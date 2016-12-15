Ext.define('Melisa.events.view.desktop.binnacle.view.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.eventsbinnacleviewwrapper',
    
    requires: [
        'Melisa.util.faker.Faker'
    ],
    
    onRender: function() {
        
        var me = this,
            model = me.getViewModel();
        
        model.getStore('events').setData(jsf(model.get('faker.events')));
        model.getStore('listeners').setData(jsf(model.get('faker.listeners')));
        
    },
    
    onSelectionchangeEventsGrid: function(sel, models) {
        
        var me = this,
            panDetails = me.lookup('panDetalles'),
            data;
    
        if( Ext.isEmpty(models)) {
            
            panDetails.collapse();
            return;
            
        }
        
        data = Ext.decode(models[0].data.data, true);
        
        panDetails.expand();
        panDetails.update({
            data: Ext.isObject(data) ? JSON.stringify(data, null, 4) : 'JSON mal formado'
        });
        
    },
    
    onSelectionchangeListenersGrid: function(sel, models) {
        
        console.log('onSelectionchangeListenersGrid');
        
    },
    
    onItemdblclickEventsGrid: function(vv, record) {
        
        var me = this,
            conPaneles = me.lookup('conPaneles');
        
        me.getViewModel().set('event', record);
        conPaneles.setActiveItem(me.getView().down('eventsbinnacleviewlistenersgrid'));
        
    }
    
});

(function($) {


	//models
	window.Vegetable = Backbone.Model.extend({
		defaults:{
	        "name":'',
			"description":'',
			"type":''
		}
			
	});
	
	
	//collections
	window.Vegetables = Backbone.Collection.extend({
		model: Vegetable,
	});
	
	
	//views
	window.VegetableSheetView = Backbone.View.extend({
	
		template : _.template($('#templateVegetableSheet').html()),
		
	    render : function() {
	        var renderedContent = this.template({vegetable : this.model.toJSON()});
            $(this.el).html(renderedContent);
            return this;
	    },
	});
	
	
	//routes
	window.App = Backbone.Router.extend({
		
	    initialize : function() {
	    },
		
		routes: {
			"": "home",
		},
		
		
		home: function() {
			
		},
		
		
	});
	
})(jQuery);

var larrosoir = new App();
Backbone.history.start();



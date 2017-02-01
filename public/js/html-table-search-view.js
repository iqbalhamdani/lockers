/**
	**options to have following keys:
		**searchText: this should hold the value of search text
		**searchPlaceHolder: this should hold the value of search input box placeholder
**/
(function($){
	$.fn.tableSearch = function(options){
		if(!$(this).is('table')){
			return;
		}
		var tableObj = $(this),
			searchText = (options.searchText)?options.searchText:'',
			searchPlaceHolder = (options.searchPlaceHolder)?options.searchPlaceHolder:'',
			uploadButton = (options.uploadButton)?options.uploadButton:'',
			
			divObj2 = $('<div class="col-sm-2">'+searchText+'</div>'),
			divObj3 = $('<div class="col-sm-3  col-sm-offset-9">'+searchText+'</div><br /><br />'),

			inputObj = $('<input type="text" class="form-control" placeholder="'+searchPlaceHolder+'" />'),
			buttonObj = $('<button type="button" id="myBtn" class="btn btn-success btn-block">'+uploadButton+'</button>'),
			
			caseSensitive = (options.caseSensitive===true)?true:false,
			searchFieldVal = '',
			pattern = '';
			
		inputObj.off('keyup').on('keyup', function(){
			searchFieldVal = $(this).val();
			pattern = (caseSensitive)?RegExp(searchFieldVal):RegExp(searchFieldVal, 'i');
			tableObj.find('tbody tr').hide().each(function(){
				var currentRow = $(this);
				currentRow.find('td coba').each(function(){
					if(pattern.test($(this).html())){
						currentRow.show();
						return false;
					}
				});
			});
		});
		
		tableObj.before(divObj3.append(inputObj));
		return tableObj;
	}
}(jQuery));
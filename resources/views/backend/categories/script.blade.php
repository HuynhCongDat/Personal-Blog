@section('script')
  <script type="text/javascript">
    // $('ul.pagination').addClass('no-margin pagination-sm');

    $('#title').on('blur', function(){
    	var theTitle = this.value.toLowerCase().trim(),
    	    slugInput = $('#slug');
    	    
	        // remove accents, swap ñ for n, etc
		var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆĞÍÌÎÏİŇÑÓÖÒÔÕØŘŔŠŞŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇğíìîïıňñóöòôõøðřŕšşťúůüùûýÿžþÞĐđßÆa·/_,:;";
        var to   = "AAAAAACCCDEEEEEEEEGIIIIINNOOOOOORRSSTUUUUUYYZaaaaaacccdeeeeeeeegiiiiinnooooooorrsstuuuuuyyzbBDdBAa------";
		for (var i=0, l=from.length ; i<l ; i++) {
		   theSlug1 = theTitle.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
		}                  
		theSlug = theSlug1.replace(/&/g, '-and-')
    	                      .replace(/[^a-z0-9-]+/g, '-')
    	                      .replace(/\-\-+/g, '-')
    	                      .replace(/^-+|-+$/g, '')

    	slugInput.val(theSlug);
    });

  </script>
@endsection
$(function() {
    
    var index = 0;
    
    var grid_width = $("#grid").width();
    var grid_height = $("#grid").height();
    
    var shudo = $("#shudo");
    var sando = $("#sando");
    
    var shudo_orig = grid_width/2;
    var sando_orig = grid_height+500/4;

    var shudo_unit = grid_width/40;
    var sando_unit = 250;

    //$('[data-toggle=popover]').popover();

    $("#donation").popover({
        html : true, 
        content: function() {
          return $('#popover_content_wrapper').html();
        }
    });
    
    shudo.keyup(function() {
        FixInitPosition();
    });
                
    sando.keyup(function() {
        FixInitPosition();
    });
    
    $("#areabg").change(function() {
        var isChecked = $(this).is(":checked");

        if(isChecked){
            $("#grid").css({"background-image": "url('images/grid2.png')"});  
            $(".saketype").hide();
            $("#color_container").slideDown("slow");
        }else{
            $("#grid").css({"background-image": "url('images/grid1.png')"});  
            $(".saketype").delay(800).fadeIn(1000);
            $("#color_container").slideUp("slow");
        }
    });

    $("#marker_color").change(function() {
        var imageUrl = 'images/';
        var value = $( "#marker_color" ).val();
        $('#mark').css('background-image', 'url(' + imageUrl + 'marker-' + value + '.png)');
    });
    
    $("#dlpng").on('click', function() {
        
        var customwidth = 645;
        
        if($("#color_container").is(":visible"))
            customwidth = 775;
        
        html2canvas(document.body, {
            onrendered: function(canvas) {
                ctx = canvas.getContext("2d");
                canvas.toBlob(function(blob) {
                    saveAs(blob, "nihonshu_chart.png");
                })
                /*Canvas2Image.saveAsPNG(canvas);*/
                /*document.body.appendChild(canvas);*/
            },
            width: customwidth,
            height: '700'
        });
    });
    
    FixInitPosition();
    
    function FixInitPosition(){
        $("#mark").css('margin-left', shudo_orig-24.5-(shudo_unit*shudo.val())+"px");
        $("#mark").css('margin-top', sando_orig-45.5-(sando_unit*sando.val())+"px");
    }
});
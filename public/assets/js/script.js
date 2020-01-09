$('.show-all').click(function(){
    var $this = $(this);

    $this.toggleClass('active');
    if($this.hasClass('active')) {
        $('td:nth-child(2)').removeClass('hide');
        $this.html('Hide All');
    } else {
        $('td:nth-child(2)').addClass('hide');
        $this.html('Show All');
    }
});

$('.clickable').click(function(){
    $(this).next().toggleClass('hide');
});

$('.topic').click(function(){
    $(this).toggleClass('hide-content');
    if($(this).hasClass('hide-content')) {
        $(this).parents('table').find('td:nth-child(2)').addClass('hide');
    } else {
        $(this).parents('table').find('td:nth-child(2)').removeClass('hide');
    }

});

$(document).find('.warning').click(function(){
    $(this).remove();
});


$('.example button').click(function(){
    var desc = $(this).parent().data('desc');
    $('.modal p').html(desc);
    $('.modal').removeClass('hidden');
});


$('html').click(function(e){
    
    if($(e.target).parent().hasClass('example')) {
        return;
    }
    var $modal = $('.modal');
    if(!$modal.hasClass('hidden')) {
        $modal.addClass('hidden');
    }
});

$('.example input').click(function(){
    var $this = $(this);
    var data = {
        checked: $this.is(':checked'),
        translationId: $this.data('id')
    };

    $.post("/forgot", data)
        .done(function(response){
            if(response !== 'success') {
                $this.prop('checked', false); 
                alert("something went wrong");
            }
        });
});

    $(document).ready(function () {
        $("#today-list li").draggable({
            helper:'clone'
        });
        $("#done-list-div").droppable({
            // accept: 'li[data-value="name"]',
            drop: function (event, ui) {
                $("#done-list").append(ui.draggable);
                var id = ui.draggable.attr('data-id');
                var status = 1;
                $.post("/tasks/update", {id:id, status:status, _token:$("input[name=_token]").val()});
                // $("#done-list-div").load(location.href + " #done-list", " #today-list");

            }
        })

        $("#done-list li").draggable({
            helper :  'clone'
        });

        $("#today-list-div").droppable({
            drop : function (event, ui) {
                $("#today-list").append(ui.draggable);
                var id = ui.draggable.attr('data-id');
                var status = 0;
                $.post("/tasks/update", {id:id, status:status, _token:$("input[name=_token]").val()});
                // $("#today-list-div").load(location.href + " #today-list", " #done-list");
            }
        })

        $('.confirm-deal').on('click', function(){
            window.confirm('Click ok to confirm this deal');
        })


    })

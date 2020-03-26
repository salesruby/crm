
    $(document).ready(function () {
        $("#today-list li").draggable({
            helper:'clone'
        });
        $("#done").droppable({
            // accept: 'li[data-value="name"]',
            drop: function (event, ui) {
                $("#done-list").append(ui.draggable);
                var id = ui.draggable.attr('data-id');
                $.post("/tasks/update", {id:id, _token:$("input[name=_token]").val()});
                $("#done").load(location.href + " #done");
            }
        })
    })

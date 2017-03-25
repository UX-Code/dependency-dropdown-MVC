$("#sel-country").change(function(){
    var code = $(this).val();
    var action  = "loadState";
    $.post("index.php?c=addons&a=loadState",{code:code, action:action},function(data){
          $("#sel-state").html(data);
          $("#sel-city").html("<option value=''>Seleccione una ciudad</option>");
    });
});


$("#sel-state").change(function(){
    var code = $(this).val();
    var action  = "loadCity";
    $.post("index.php?c=addons&a=loadCity",{code:code, action:action},function(data){
          $("#sel-city").html(data);
    });
});

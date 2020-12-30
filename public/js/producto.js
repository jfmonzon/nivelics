$(document).ready(function()
{
    $.validator.setDefaults({
        submitHandler: function()
        {
            return true;
        }
    });

    $("#create_producto").validate({
        rules:
        {
            description:
            {
                required:true,
                minlength:3,
                maxlength:255,
            },

            proveedor_id:
            {
                required:true,
                number: true


            },
            price:
            {
                required:true,
                number: true


            },
            quantity:
            {
                required:true,
                number: true


            },



        },
        messages:
        {
            description:
            {
                required: "El nombre del producto es obligatorio",
                minlength: "El nombre del producto debe tener mínimo 3 caracteres.",
            },

            proveedor_id:
            {
                required: "Debe seleccionar un proveedor.",

            },
            price:
            {
                required: "Debe poner un numero",
                numbre: "debe ser un numero"
            },
            quantity:
            {
                required: "Debe poner un numero",
                numbre: "debe ser un numero"
            },


        },
        errorPlacement: function (error,element)
        {
            error.addClass("invalid-feedback");
            if ( element.is(":radio") )
            {
                error.appendTo( element.parents('.errores') );
            }
            else
            {
                if(element.prop("type") === "checkbox")
                {
                    error.insertAfter(element.parent("label"));
                }
                else
                {
                    error.insertAfter(element);
                }
            }
        },
        highlight: function (element,errorClass,validClass)
        {
            $(element).addClass("border-danger");
        },
        unhighlight: function (element,errorClass,validClass)
        {
            $(element).removeClass("border-danger");
        }
    });
});

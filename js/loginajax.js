$('#iniciosesionlg').submit(function(e) {
    e.preventDefault();
    var userinicio = $.trim($('#userinicio').val());
    var passinicio = $.trim($('#passinicio').val());
    //alert(userinicio);
    if (userinicio.length == '' || passinicio.length == '') {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Por favor, rellene todos los campos'
        });
        return false;
    } else {
        $.ajax({
            url: 'php/loginajax.php',
            type: 'POST',
            datatype: 'json',
            data: {
                userinicio: userinicio,
                passinicio: passinicio
            },
            success: function(res) {
                console.log(res);
                if (res == 'null') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Usuario o contraseña incorrectos'
                    });

                }
                if (res == 'paciente') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido',
                        text: 'Redireccionando...'
                    });
                    setTimeout(function() {
                        window.location.href = 'paciente/index.php';
                    }, 2000);
                }
                if (res == 'medico') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido',
                        text: 'Redireccionando...'
                    });
                    setTimeout(function() {
                        window.location.href = 'doctor/index.php';
                    }, 2000);
                }
                if (res == 'admin') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido',
                        text: 'Redireccionando...'
                    });
                    setTimeout(function() {
                        window.location.href = 'dashboard/index.php';
                    }, 2000);
                }
            }
        });
    }
});
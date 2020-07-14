
function redirectToProfile(_src) {

    console.log(_src);

    if (_src.includes("Fernando")) {

        window.location.href = "PerfilUsuario.php";
    } else {

        window.location.href = "PerfilVizinho.php";
    }
}

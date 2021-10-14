<footer class="footer" id="footer">
        <div class="copyright">Copyright 2021 © Curtly. Todos os direitos reservados.</div>
    </footer>
    <script>
        function copiarTexto() {
            var textoCopiado = document.getElementById("linkcopy");
            textoCopiado.select();
            document.execCommand("Copy");
            document.querySelector("#btncopy").innerHTML = "URL Copiada!";
        }
    </script>
</body>

</html>
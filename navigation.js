const elementoBtnRanking = $('#btn-ranking');
const elementoBtnHome = $('#btn-home');

elementoBtnHome.on("click", function () {
    window.location.href = 'index.php';
});

elementoBtnRanking.on("click", function () {
    window.location.href = 'ranking.php';
});
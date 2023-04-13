<style>
    body {
        margin: 0;
        padding: 0;
    }

    .bgTransi {
        width: 100%;
        height: 100vh;
        background-image: url('https://zupimages.net/up/23/15/3pm3.jpg');
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h2 {
        color: white;
        font-size: 2em;
        text-shadow: 1px 1px 2px black;
        background:#FE5858B3;
        padding:10px;
    }
</style>

<div class="bgTransi">

    <h2>
        <?= $message['msg'] ?>
    </h2>

</div>
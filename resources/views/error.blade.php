
<style>

  .error{
    position: relative;
    display: flex;
    align-items: center;
    flex-direction: column;
    top: 70px;
  }

  .error p{
    font-size: 22px;
    color: tomato;
    font-weight: 500;
  }

  .error a{
    background-color: rgb(0, 124, 192);
    padding: 20px 40px;
    color: white;
    text-decoration: none;
    font-size: 20px;
    border: none;
    border-radius: 8px;
    transition: all 500ms
  }

  .error a:hover{
    transform: scale(1.04);
    background-color: rgb(15, 155, 230);
  }

</style>

<div class="error">

  <p>{{ $message }}</p>
  <a href="{{ URL('/cashier') }}">
    {{ $buttonText }}
  </a>

</div>

@include('user.layout.header')
<div class="body" >
<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    

    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
   
    <label for="location">Location:</label>
    <textarea id="location" name="location"></textarea>

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" required>
   

    <button type="submit">Upload</button>
</form>
</div>
</div>
@include('user.layout.footer')

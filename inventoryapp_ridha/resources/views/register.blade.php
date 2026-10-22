<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
  </head>
  <body>
    <form action="/welcome" method="post">
      @csrf
      <h1>Buat akun baru</h1>
      <h2>sign up</h2>
      <label for="Firstname">First name :</label>
      <br />
      <br />
      <input type="text" name="Firstname" />
      <br />
      <br />
      <label for="Lastname">Last name :</label>
      <br />
      <br />
      <input type="text" name="Lastname" />
      <br />
      <br />
      <label for="Gender">Gender :</label>
      <br />
      <br />
      <input type="radio" id="gen1" name="gender" value="Male" checked />Male
      <br />
      <input type="radio" id="gen2" name="gender" value="Female" />Female
      <br />
      <input type="radio" id="gen3" name="gender" value="Other" />Other
      <br />
      <br />
      <label for="Nationality">Nationality :</label>
      <br />
      <br />
      <select name="nationality" id="">
        <option value="nat1">Indonesia</option>
        <option value="nat2">Malaysia</option>
        <option value="nat3">Singapura</option>
      </select>
      <br />
      <br />
      <label for="Languagespoken"></label>Language spoken :
      <br />
      <br />
      <input type="checkbox" name="Languagespoken" />Bahasa Indonesia
      <br />
      <input type="checkbox" name="Languagespoken" />English
      <br />
      <input type="checkbox" name="Languagespoken" />Other
      <br />
      <br />
      <label for="Bio">Bio :</label>
      <br />
      <br />
      <textarea name="bio" id="" rows="4" cols="20"></textarea>
      <br />
      <button type="submit">Sign up</button>
    </form>
  </body>
</html>

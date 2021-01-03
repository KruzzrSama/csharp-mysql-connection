## Giriş
C# mysql select, insert ve update işlermleri

- ##### Select işlemi

```csharp
public static string DataConfig = "server=localhost;database=denememysqlcsharp;uid=root;pwd=";

MySqlConnection con = new MySqlConnection(MySQLConnection.DataConfig);

con.Open();
Console.WriteLine("Version: " + con.ServerVersion + "\n");
// Select işlemi - database deki bir veriyi çekmek için kullanılır.
MySqlCommand select = new MySqlCommand("SELECT * FROM deneme_db ORDER BY id ASC", con);
int Count = Convert.ToInt32(select.ExecuteScalar());
if (Count != 0)
{
	MySqlDataReader dr = select.ExecuteReader();
	while (dr.Read())
	{
		Console.WriteLine("Username: " + dr["db_username"] + "\nPassword: "+ dr["db_password"] +"\nPerm: " + dr["db_perm"] + "\n");
	}
}
con.Close();
Console.ReadLine();
```

- ##### Insert işlemi
```csharp
public static string DataConfig = "server=localhost;database=denememysqlcsharp;uid=root;pwd=";

MySqlConnection con = new MySqlConnection(MySQLConnection.DataConfig);
con.Open();
Console.WriteLine("Version: " + con.ServerVersion + "\n");
// Insert işlemi - database e yeni bir veri eklemek için kullanılır.
string username = "deneme_username";
string password = "deneme_sifre";
string perm = "deneme_perm";

MySqlCommand insert = new MySqlCommand("INSERT INTO deneme_db (db_username,db_password,db_perm) VALUES (@uname,@pass,@perm)", con);
insert.Parameters.AddWithValue("@uname", username);
insert.Parameters.AddWithValue("@pass", password);
insert.Parameters.AddWithValue("@perm", perm);
insert.ExecuteNonQuery();
Console.WriteLine("Yeni veri eklendi");
Console.ReadLine();
// Insert işlemi - son
con.Close();
```

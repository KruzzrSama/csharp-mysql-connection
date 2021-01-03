using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace denememysql
{
    public class MySQLConnection
    {
        public static string DataConfig = "server=localhost;database=denememysqlcsharp;uid=root;pwd=";
    }
    class Program
    { 
        static void Main(string[] args)
        {
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
        }
    }
}

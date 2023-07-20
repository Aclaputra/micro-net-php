using Microsoft.AspNetCore.Components;
using Microsoft.AspNetCore.Components.Web;
using Microsoft.EntityFrameworkCore;
using RestApiWithBlazort.Context;
using RestApiWithBlazort.Models;
using System.Runtime.CompilerServices;
using System.Text.Json;
using System.Text.Json.Serialization;

var builder = WebApplication.CreateBuilder(args);
builder.Services.AddRazorPages();
builder.Services.AddServerSideBlazor();

// Register
builder.Services.AddDbContext<ApplicationDBContext>(options =>
{
    // Configuration from appsettings.json file  
    try
    {
        options.UseNpgsql("Server=localhost;Port=5432;Database=Arranet_db;User Id=postgres;Password=root");
        Console.WriteLine("Connection Succeed.");
    } catch (Exception ex)
    {
        Console.WriteLine(ex);
    }
});

var app = builder.Build();
var people = app.MapGroup("/people");
var student = app.MapGroup("/student");

// example 1 with no DB
people.MapGet("/", () => new[]
{
    //return await db.ToListAsync();
    new Person("Acla"), new Person("Ana"), new Person("Philip")
});

student.MapGet("/", async (ApplicationDBContext db) => 
{
    return await db.Students.ToListAsync();
});


student.MapGet("/{id}", async (int id, ApplicationDBContext db) =>
{   
    return await db.Students.FindAsync(id);
});

/*var serializeOptions = new JsonSerializerOptions();
serializeOptions.Converters.Add(new Int32Converter());
Student studentObj = JsonSerializer.Deserialize<Student>()*/

student.MapPost("/create", async (Student student, ApplicationDBContext db) =>
{
    db.Students.Add(student);
    await db.SaveChangesAsync();
    return Results.Created($"/student/{student.Id}", student);
});


if (!app.Environment.IsDevelopment())
{
    // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
    app.UseHsts();
}

app.UseHttpsRedirection();

app.UseStaticFiles();

app.UseRouting();

app.MapBlazorHub();
app.MapFallbackToPage("/_Host");

app.Run();



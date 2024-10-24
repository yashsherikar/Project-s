import java.io.File;
import java.io.IOException;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.Scanner;

import javax.swing.JLabel;

import chatbot.chatbot;
import java.awt.Desktop;
import programs.Programs;



class Main_ChatBott 
{
    // private jLable heading = new JLabel();w
   
    void ChatterFunction() throws IOException
    {
        Scanner sc  = new Scanner(System.in);

        Runtime runTime = Runtime.getRuntime(); // It is For Open exe files

        Desktop desktop = Desktop.getDesktop(); // It is Also Use for open files and Folders also

        LocalTime time = LocalTime.now();      // to get current time

        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("HH:mm:ss");  // te get pattern of time

        System.out.println("........."+time.format(formatter)+".........."); // fromat means how we want to get time format

        System.out.println("Hello Sir, I am Eva Your Assistance.");
        while(true)
        {
            System.out.print("Eva Assistance -> ");
            String str = sc.nextLine();
            
            str = str.toLowerCase();                                      // To Conver All String in LowerCase

            String TempStr = str;
            String GetSong = "";
            
            String[] ArrStr = str.split("\\s");   // In this arr it spilt string and remover blank space using \\s 
            for(String w:ArrStr)
            {  
               
                if(w.equals("play") || (w.equals("song")))
                {
                    System.out.println("Do You Want Play On YouTube Or On Spotify?");
                    String GetSongStr = sc.nextLine();
                    GetSongStr.toLowerCase();

                    System.out.println("Which Song Do You Listen?");
                    GetSong = sc.nextLine();


                    if(GetSongStr.equals("youtube"))
                    {
                        str = "play song"; 
                        break;
                    }
                    else if(GetSongStr.equals("Spotify"))
                    {
                        System.out.println("Song Name Please");
                        TempStr = sc.nextLine();

                        str = "play on spotify";
                        break;
                    }
                }
                else if(w.equals("time") || (w.equals("date")))
                {
                    if(w.equals("time"))
                    {
                        str = "what is current time";
                        break;
                    }
                    else if(w.equals("date"))
                    {
                        str = "what is today's date";
                        break;
                    }
                }
                else if((w.equals("who") || (w.equals("about")  || (w.equals("what")))))
                {
                    str = "can you search";
                    break;
                }
                else if(w.equals("code") || w.equals("program"))
                {
                    System.out.println("Which Programming Language?");
                    String lngStr = sc.nextLine();

                    lngStr = lngStr.toLowerCase();

                    if(lngStr.equals("c"))
                    {
                        Programs.ProgramIn(lngStr);
                        break;
                    }
                    else if(lngStr.equals("java"))
                    {
                        Programs.ProgramIn(lngStr);
                        break;
                    }
                    else
                    {
                        System.out.println("I Can't Wrie Program In "+lngStr+" Language");
                    }
                    
                }

            }  
            

            if(str.equals("open notepad"))
            {
                System.out.println("You Want to open Existing File Or Recent File or Create New File: ");
                String openfile = sc.nextLine();

                openfile = openfile.toLowerCase();
                // System.out.println("You Want To write Any note Or Content(Yes/No)");
                // String note = sc.nextLine();
                if(openfile.equals("existing"))
                {
                    System.out.print("Enter The Existing File Name : ");
                    String existfile = sc.nextLine();
                    runTime.exec("notepad.exe "+existfile);
                    System.out.println("..........Notepad Open Succesfully........");
                }
                else if(openfile.equals("recent"))
                {
                    runTime.exec("notepad.exe");
                    
                    System.out.println("..........Notepad Open Succesfully........");
                    
                    System.out.println("You Want Write Somthing Or You want to Close Noteped");
                    String WRstring = sc.nextLine();
                    
                }
                else if(openfile.equals("create") || openfile.equals("create new file"))
                {
                    System.out.println("Enter The File Name :");
                    String FileName = sc.nextLine();
                    File file = new File(FileName);
                    file.createNewFile();
                    System.out.println("File Created Successfully");
                    runTime.exec("notepad.exe "+FileName);
                    System.out.println("..........Notepad Open Succesfully........");
                }
              
            }
            else if(str.equals("open chrome"))
            {
                runTime.exec("C:\\Users\\yashe\\AppData\\Local\\Google\\Chrome\\Application\\chrome.exe");
                System.out.println("..........Chrome Open Succesfully........");
            }
            else if(str.equals("open youtube"))
            {
                // we creat the array string the resone is we want run two tasks
                String s[] = new String[]{"C:\\Users\\yashe\\AppData\\Local\\Google\\Chrome\\Application\\chrome.exe","https://www.youtube.com/"};
                runTime.exec(s);
                System.out.println("..........Youtube Open Succesfully........");
            }
            else if(str.equals("can you search"))
            {
                String s[] = new String[]{"C:\\Users\\yashe\\AppData\\Local\\Google\\Chrome\\Application\\chrome.exe" ,"https://www.google.com/search?q= "+TempStr};  
                System.out.println("Here We Go!");
                runTime.exec(s);
            }
            else if(str.equals("play song"))
            {

                String s[] = new String[]{"C:\\Users\\yashe\\AppData\\Local\\Google\\Chrome\\Application\\chrome.exe" ," https://www.youtube.com/results?search_query= "+GetSong};  
                System.out.println("Here We Go!");
                System.out.println("..........Song Play On YouTube Succesfully........");
                runTime.exec(s);
               
            }
            else if(str.equals("open spotify"))
            {
                String s[] = new String[]{"C:\\Users\\yashe\\AppData\\Local\\Google\\Chrome\\Application\\chrome.exe","https://open.spotify.com/?utm_source=pwa_install"};
                runTime.exec(s);
                System.out.println("..........Spotify Open Succesfully........");
            }
            else if(str.equals("play on spotify"))
            {
                String s[] = new String[]{"C:\\Users\\yashe\\AppData\\Local\\Google\\Chrome\\Application\\chrome.exe","https://open.spotify.com/search/"+GetSong};
                runTime.exec(s);
                System.out.println("..........Song Play On Spotify Succesfully........");
            }
            else if(str.equals("open movie folder") || str.equals("open movie file"))
            {
                File file = new File("A:\\movies");
                desktop.open(file);
                System.out.println("..........Open Movie Folder Succesfully........");
            }
            else if(str.equals("what is current time"))
            {
                System.out.println("Current Time Is : "+time.format(formatter));
            }
            else if(str.equals("what is today's date"))
            {
                LocalDate date = LocalDate.now();  
                DateTimeFormatter formatter2 = DateTimeFormatter.ofPattern("yyyy:MM:dd");
                System.out.println("Today's Date Is : "+date.format(formatter2));
            }
            else
            {
                chatbot.chat(str);
            }
        }
    }
}

   

class Assistance
{
    
    public static void main(String arg[]) throws IOException
    {
        Main_ChatBott mObj = new Main_ChatBott();
        mObj.ChatterFunction();
        
    }
}
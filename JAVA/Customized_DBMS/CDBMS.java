// Customised Database Management System

class node
{
    private static int Counter = 1;

    public int Rno;
    public String Name;
    public String City;
    public int Marks;

    public node next;

    public node(String B, String C, int D)
    {
        Rno = Counter;
        Counter++;
        Name = B;
        City = C;
        Marks = D;
        next = null;
    }
}

class DBMS
{
    private node first;

    public DBMS()
    {
        first = null;
        System.out.println("DBMS initailised succesfully...");
        System.out.println("Student Table gets created succesfully...");
    }

    // InsertLast
    // insert into table student values(1,'Amit','Pune',89);
    public void InsertIntoTable(String Name, String City, int Marks)
    {
        node newn = new node(Name,City,Marks);

        if(first == null)
        {
            first = newn;
        }
        else
        {
            node temp = first;
            while(temp.next != null)
            {
                temp = temp.next;
            }

            temp.next = newn;
        }
        System.out.println("One record gets inserted succesfully...");
    }

    // Display
    // select * from student
    public void SelectStarFrom()
    {
        System.out.println("Data from the student table is : ");

        node temp = first;

        System.out.println("--------------------------------------------------------------");
        while(temp != null)
        {
            System.out.println(temp.Rno+"\t"+temp.Name+"\t"+temp.City+"\t"+temp.Marks);
            temp = temp.next;
        }
        System.out.println("--------------------------------------------------------------");
    }
     // select * from student where city = '______';
     public void SelectStarFromWhereCity(String str)
     {
         System.out.println("Data from the student table WHere City Is : "+str);
 
         node temp = first;
 
         System.out.println("--------------------------------------------------------------");
         while(temp != null)
         {
            if(str.equals(temp.City))
            {  
                System.out.println(temp.Rno+"\t"+temp.Name+"\t"+temp.City+"\t"+temp.Marks);
            }
            temp = temp.next;
         }
         System.out.println("--------------------------------------------------------------");
     }
     //select Cpunt(Marks) from student  
    public void SelectCount()
     {
        int iCnt = 0;

 
         node temp = first;
 
         while(temp != null)
         {
            iCnt++;
            temp = temp.next;
         }
         System.out.print("Number Of Recordes In The Table : "+iCnt);
     }

    public void SelectSum()
     {
        int iSum = 0;

         node temp = first;
 
         while(temp != null)
         {
            iSum = iSum+temp.Marks;
            temp = temp.next;
         }
         System.out.print("Summatiopn Of Marks Column Is : "+iSum);
     }

     public void SelectAvgMarks()
     {
        int iSum = 0;
        int iCnt = 0;
       
         node temp = first;
 
         while(temp != null)
         {
            iSum = iSum+temp.Marks;
            temp = temp.next;
         }
         System.out.print("Avrage Marks From Student : "+(float)((float)iSum/(float)iCnt));
     }
     public void SelectMinMarks()
     {

        node temp = first;

        int iMin = 0;

        if(temp != null)
        {
            iMin = temp.Marks;
        }
         while(temp != null)
         {
       
           if(iMin >temp.Marks)
           {
                iMin = temp.Marks;
           }
            temp = temp.next;
         }
         System.out.print("Minimum Marks From Student : "+iMin);
     }
     public void SelectMaxMarks()
     {
       
       node temp = first;

        int iMax = 0;

        if(temp != null)
        {
            iMax = temp.Marks;
        }
        while(temp != null)
         {
       
           if(iMax < temp.Marks)
           {
                iMax = temp.Marks;
           }
            temp = temp.next;
         }
         System.out.print("Maximum Marks From Student : "+iMax);
     }

    public void SelectStarFromName(String str)
     {
        node temp = first;

        while(temp != null)
        {
            if(str.equals(temp.Name))
            {
                System.out.println(temp.Rno+"\t"+temp.Name+"\t"+temp.City+"\t"+temp.Marks);

            }
            temp = temp.next;

        }
    }
    public void SelectStarFromRoll(int iNo)
    {
       node temp = first;
        System.out.println("Information Of Students By Roll Number");
       while(temp != null)
       {
           if(iNo == temp.Rno)
           {
               System.out.println(temp.Rno+"\t"+temp.Name+"\t"+temp.City+"\t"+temp.Marks);

           }
           temp = temp.next;

       }
    }

    public void UpdateCity(String str,int iNo)
    {
       node temp = first;
       while(temp != null)
       {
           if(iNo == temp.Rno)
           {
              temp.City = str;
              System.out.println(temp.Rno+"\t"+temp.Name+"\t"+temp.City+"\t"+temp.Marks);
              break;
           }
           temp = temp.next;
       }
       System.out.println("Record Get's Update");
    }
    public void Delete(int iNo)
    {
       node temp = first;
       while(temp.next != null)
       {
           if(iNo == temp.next.Rno)
           {
               temp.next = temp.next.next;
               break;
           }
           temp = temp.next;
       }
      
       System.out.println("Delete Get's Update");
    }
}

class CDBMS
{
    public static void main(String Arg[])
    {
        DBMS obj = new DBMS();

        obj.InsertIntoTable("Amit","Pune",89);
        obj.InsertIntoTable("Pooja","Mumbai",95);
        obj.InsertIntoTable("Yash", "Pune", 97);
        obj.InsertIntoTable("Rahul","Satara",80);
        obj.InsertIntoTable("Neha","Pune",78);
        // obj.SelectStarFromWhereCity("Pune");

        obj.SelectStarFrom();
        // obj.SelectSum();
        // obj.SelectAvgMarks();
        // obj.SelectMinMarks();
        // obj.SelectMaxMarks();
        // obj.SelectStarFromName("Yash");
        // obj.UpdateCity("Pune", 2);
        obj.Delete(5);
        obj.SelectStarFrom();


    }
}





/*Supported Queries 
 * 
 * Insert into student values('amit','pune',78);
 * select * from student
 * Select * from student where City  = 'pune';
 * select 
*/
public class main {

    public static void main(String[] args) {
        
        compnay cobj = new compnay();
        producer pobj = new producer(cobj);
        consumer ccobj = new consumer(cobj);

        pobj.start();
        ccobj.start();
    }
    
}

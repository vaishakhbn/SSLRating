#include<stdio.h>
#include<unistd.h>
#include<string.h>
main()
{ 
	pid_t pid;
        FILE *fp;
        char* string_result;
        int  size_total,i=0,j=0;
        char c,ch;
        char st1[] = "openssl s_client -connect ";
        //char st3[] = ":443 >certificate.txt";
        char st2[20];
        char st[200];
        //char *st;
        fp=fopen("input1.txt","r");
        //printf("%s",argv[1]);
        while((ch=fgetc(fp))!=EOF)
        {
                st2[i]=ch;
                i++;
        }
	fclose(fp);
        st2[i]='\0';
//      printf("st2 is %s",st2);
        //fclose(fp);

        if((pid=fork())<0)
                perror("V's Fork Error: ");
        if (pid==0)
        {
                strcpy(st,st1);
                strcat(st,st2);

                //strcat(st,st3);
                //strcat(st1,st2);
                //printf("..................................%s",st);
                system(st);
	}
	else
	{
		sleep(10);
		system("pkill openssl");
	}
}


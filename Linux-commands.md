# Linux commands


## Print Working Directory

```bash
 $ pwd
```


## Show my user

```bash
whoami
```


## Change directory

**go to my user directory**

```bash
cd
```

**go to parent directory**

```bash
cd ..
```


## List files

```bash
ls
```

**show more infos**

```bash
ls -l
```

**show every files/dir, even if hidden**

**ls -a**


## Create a file

```bash
touch file-name
```


## Make a directory

```bash
mkdir mydirectory
```

```bash
mkdir dir1/dir2/dir3
```


## Move (or rename) a file/dir

```bash
mv name newname
```

```bash
mv name ~/newdir/newname
```


## Copy a file

**copy a file in current directory to my home directory**

```bash
cp file ~/
```


**same but rename filename**

```bash
cp file ~/newfilename
```


## Search a man page of a command

Ex: cp

```bash
man cp
```


## Change rights of a file

execute -> x = 1
read    -> r = 2
write   -> w = 4

u = user
g = group
o = other

dir/file    user    group   others
-           rwx     rwx     rwx


**Give rw rw to user and group**

```bash
chmod 660 file
```


**Add read right for others**

```bash
chmod o+w
```


## Change owner of a file

```bash
chown user:group
```

Example: Make stef owner of file

```bash
chown stef
```

Same but with the group too

```bash
chown stef:stef
```


## Take root user to execute a command

```bash
sudo chown root:root root-only-file
```


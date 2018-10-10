# MasterModel for CodeIgniter 3

This version of MasterModel is a model helper package for [CodeIgniter 3](http://codeigniter.com). Mastermodel provides helper functions similar to laravel eloquent.


## Server Requirements

CodeIgniter 3 server requirements also apply to MasterModel. If you already have CodeIgniter 3 working, MasterModel should fit right in.

## Installation

Put MasterModel.php in your application/model directory

## Usage

Extend MasterModel in your model files.
```
require APPPATH.'/models/MasterModel.php';

Class User_model extends MasterModel {
    protected $table = 'users';//declare table name

}
```
Now you have access to all the helper functions in your model.

## Examples


### Insert

```
$this->user_model->insert([
	'name'		=> 'Overcmer',
	'email'		=> 'ov@example.com',
	'active'	=> 1,
]);
```

### Update

```
$this->user_model->where('id',1)->update([
	'name'		=> 'Overcomer',
]);
```

### Select

**Select "WHERE"**

```
//get all users 
$this->user_model->get(); // array of objects

// get all users with id greater than 5 
$this->user_model->where('id > ',5)->get(); // array of objects

// get user with id of 1 
$this->user_model->find(1); // single object

// get user with customer_id of 1
$this->user_model->find(1,'customer_id'); // single object
```

**Select "AND"**

```
// get users with id greater than 5 and less than 10
$this->user_model->where('id > ',5)->where('id < ',10)->get(); // array of objects
```

**Select "OR"**

```
// get users with id of 5 OR id of 10
$this->user_model->orWhere(['id'=>5, 'id'=>10,])->get(); // array of objects
```

**Select "AND/OR"**

```
// get active users with id of 5 OR id of 10
$this->user_model->where('active',1)->orWhere(['id'=>5, 'id'=>10,])->get(); // array of objects
```

**Get count**

```
// Just replace get() with count() in any of the above queries
$this->user_model->where('id > ',5)->count(); // int
```

**Order results**

```
$this->user_model->where('id > ',5)->orderBy('id')->get(); // ASC
$this->user_model->where('id > ',5)->orderBy('id','DESC')->get(); // DESC
```

**Limit results**

```
$this->user_model->limit(0,10)->get(); // returns 10 rows, starting from 0
```

### Acknowledgments

Inspired by [Laravel](https://laravel.com).


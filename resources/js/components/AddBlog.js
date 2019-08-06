import React, { Component } from 'react';
import { Link } from "react-router-dom";

export default class Blog extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blogs: [],
            title: "",
            content: "",
        }
        this.handleChange = this.handleChange.bind(this);
        this.renderBlogs = this.renderBlogs.bind(this);
    }

    renderBlogs() {
        return this.state.blogs.map(blog => (
            <div key={blog.id_blog} className="media">
                <div className="media-body">
                    <h2>{blog.title}</h2>
                    <p>{blog.content}</p>
                    <p>Created {blog.created} by {blog.user.name}</p>
                </div>
            </div>
        ));
    }

    handleSubmit(e) {

    }

    handleChange(e) {
        this.setState({
            [e.target.name] : e.target.value,
        });
    }
    
    getBlogs() {
        axios.get("/blogs").then(response =>
            this.setState({
                blogs : [...response.data.blogs],
            })
        );
    }

    componentDidMount() {
        this.getBlogs();
    }
    
    render() {
        return (
            <div>
                <h1>Blog Form</h1>
            <form onSubmit = {this.handleSubmit}>
                <div className="form-group">
                    <label for="title">Judul</label>
                    <input className="form-control" onChange={this.handleChange} value={this.state.title} name="title"></input>
                </div>
                <div className="form-group">
                    <label for="content">Isi</label>
                    <textarea className="form-control" onChange={this.handleChange} value={this.state.content} name="content" placeholder="Create your blog"></textarea>
                </div>
                <button type="submit" className="btn btn-primary"></button>
            </form>
            {this.renderBlogs()}
            </div>
        );
    }
}